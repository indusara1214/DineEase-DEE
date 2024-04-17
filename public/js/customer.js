//!Navigation of fieldsets
let selectedDateForReservation = "";
let selectedSlotForReservation = "";
let selectedNoOfPeopleForReservation = "";
let selectedPackageForReservation = "";
let slotDetails;
let slotMaxCapacity = 15;
var today = new Date();
const baseCostPerPerson = 500;

$(document).ready(function () {
  var current = 1;
  var steps = $("fieldset").length;

  setProgressBar(current);

  $(".next").click(function () {
    var current_fs = $(this).parent();
    var next_fs = $(this).parent().next();

    // Activate next step on progressbar
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    // Hide the current fieldset and show the next one
    current_fs.hide();
    next_fs.show();
    setProgressBar(++current);
  });

  $(".previous").click(function () {
    var current_fs = $(this).parent();
    var previous_fs = $(this).parent().prev();

    // De-activate current step on progressbar
    $("#progressbar li")
      .eq($("fieldset").index(current_fs))
      .removeClass("active");

    // Hide the current fieldset and show the previous one
    current_fs.hide();
    previous_fs.show();
    setProgressBar(--current);
  });

  function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar").css("width", percent + "%");
  }

  $(".submit").click(function () {
    return false;
  });
});

//!Function to switch between menu options

$(document).ready(function () {
  // When a radio button is clicked
  $("input[type=radio][name=menu]").change(function () {
    // Get the value of the selected radio button
    var selectedMenu = $(this).val();

    // Load the content for the selected menu option
    $("#" + selectedMenu)
      .show()
      .siblings()
      .hide();
  });

  // Show the appetizers by default
  $("#appetizers").show();
});

$(document).ready(function () {
  $(".nav_link_switch").click(function (e) {
    e.preventDefault();

    // Get the content attribute value
    var content = $(this).data("content");

    // Make an AJAX request to fetch the content
    $.ajax({
      url: "index.php", // Change this to the actual handler
      method: "POST",
      data: { content: content },
      success: function (response) {
        // Update the content in the body-template
        $("#content").html(response);
      },
      error: function (xhr, status, error) {
        console.error("Error: " + error);
      },
    });
  });
});

$(".button-sidebar-menu").on("click", function () {
  // Remove 'active' class from all buttons
  $(".button-sidebar-menu").removeClass("active-nav");

  // Add 'active' class to the clicked button
  $(this).addClass("active-nav");
});

$(document).ready(function () {
  $("#add-review-popup").hide();
});

function toggleReviewForm() {
  var reviewPopup = document.getElementById("add-review-popup");
  reviewPopup.style.display =
    reviewPopup.style.display === "none" ? "block" : "none";
}

//!functions for Reviews

function toggleComment(reviewID) {
  var moreContent = document.getElementById("more-" + reviewID);
  var fullContent = document.getElementById("full-comment-" + reviewID);

  moreContent.style.display = "none";
  fullContent.style.display = "inline";
}

function toggleComment(reviewID) {
  var moreText = document.getElementById("more-" + reviewID);
  var fullComment = document.getElementById("full-comment-" + reviewID);

  if (fullComment.style.display === "none") {
    moreText.style.display = "none";
    fullComment.style.display = "inline";
  } else {
    moreText.style.display = "inline";
    fullComment.style.display = "none";
  }
}

//!functions for time slots
$(document).ready(function () {
  $("#checkSlots").click(function () {
    var dateOfTheReservation = today.getDate();
    if (selectedDateForReservation == dateOfTheReservation) {
      $.ajax({
        url: "getReservationSlots",
        data: { date: dateOfTheReservation },
        dataType: "json",
        success: function (response) {
          slotDetails = response;
        },
        error: function (xhr, status, error) {
          console.error("Error fetching data:", error);
        },
      });
    }
    $("#time-slots").empty();
    createTimeSlot();
    addClickHandlers();
  });

  //TODO: #36 Time slots are only being displayed correctly when the page is loaded for the first time.
  function createTimeSlot() {
    for (var hour = 8; hour <= 23; hour++) {
      var timeString = (hour < 10 ? "0" + hour : hour) + ":00";
      var slotIsFull = false;
      var timeIsPassed = false;
      function checkIsSlotFull() {
        if (slotDetails) {
          for (var slot of slotDetails) {
            var sum =
              Number(slot.slotCapacity) +
              Number(selectedNoOfPeopleForReservation);
            if (
              //add condition to check the current time and disable the past time
              slot.slot === hour &&
              sum >= slotMaxCapacity
            ) {
              // console.log(hour);
              // console.log(slot.slotCapacity +" "+ selectedNoOfPeopleForReservation +" "+sum+" " + slotMaxCapacity);
              // console.log("Slot is full");
              return true;
            }
          }
        }
      }

      function checkIsTimePassed() {
        console.log("called");
        var currentTime = new Date();
        // console.log(currentTime);
        // console.log(selectedDateForReservation);
        var currentHour = currentTime.getHours();
        // console.log(currentHour);
        // console.log(hour);
        // console.log(hour < currentHour);
        if (selectedDateForReservation === today.getDate()) {
          if (hour <= currentHour) {
            return true;
          }
        }
      }

      slotIsFull = checkIsSlotFull();
      timeIsPassed = checkIsTimePassed();

      var $timeSlot = $("<div>", {
        class:
          (slotIsFull || timeIsPassed ? " faded " : "time-slot") +
          (hour === 8 && !slotIsFull && !timeIsPassed ? " selected" : ""),
        id: "time-slot",
        "data-time": timeString,
        text: timeString,
      });

      $("#time-slots").append($timeSlot);
    }
  }

  function addClickHandlers() {
    $(".time-slot:not(.faded)").click(function () {
      $(".time-slot").removeClass("selected");
      $(this).addClass("selected");
      var selectedTime = $(this).data("time");
      $("#selectedTime").val(selectedTime);
      $("#summary-time").text(selectedTime);
      selectedSlotForReservation = selectedTime;
    });
  }
});

// no of people
$(document).ready(function () {
  $(".person-icon").click(function () {
    $(".person-icon").removeClass("selected");
    $(this).addClass("selected");
    var selectedNumber = $(this).data("value");
    $("#numOfPeople").val(selectedNumber);
    $("#summary-people").text(selectedNumber);
    selectedNoOfPeopleForReservation = selectedNumber;
  });
});

// date picker

//fixed: #27 Dater Picker does not take the default date as the selected date without clicking on it again.

$(document).ready(function () {
  var dateOfTheReservation = today.getDate();
  selectedDateForReservation = dateOfTheReservation;
  $.ajax({
    url: "getReservationSlots",
    data: { date: dateOfTheReservation },
    dataType: "json",
    success: function (response) {
      slotDetails = response;
    },
    error: function (xhr, status, error) {
      console.error("Error fetching data:", error);
    },
  });

  $(".date-slot").click(function () {
    $(".date-slot").removeClass("selected");
    $(this).addClass("selected");
    var selectedDate = $(this).data("date"); // Get the date data from the clicked slot
    $("#selectedDate").val(selectedDate); // Set the value of the hidden input field
    $("#summary-date").text(selectedDate); // Update the text of the summary field
    selectedDateForReservation = selectedDate;
    console.log(selectedDateForReservation);
    $.ajax({
      url: "getReservationSlots",
      data: { date: selectedDate },
      dataType: "json",
      success: function (response) {
        console.log(response);
        slotDetails = response;
      },
      error: function (xhr, status, error) {
        console.error("Error fetching data:", error);
      },
    });
  });
});

//!function to select no of people

// people Selection
$(document).ready(function () {
  $(".person-icon").click(function () {
    var selectedNumber = $(this).data("value"); // Get the value data from the clicked icon
    $("#numOfPeople").val(selectedNumber); // Set the value of the hidden input field
    $(".person-icon").removeClass("selected");
    $(this).addClass("selected");
    $("#summary-people").text(selectedNumber); // Update the text of the summary field
    updateTotalAmount(); // Update the total amount when the number of people changes
  });
});

$(document).ready(function () {
  // Update the package in the summary when a package is selected
  $('input[name="packageID"]').change(function () {
    var selectedPackage = $('input[name="packageID"]:checked')
      .next(".name")
      .text();
    $("#summary-package").text(selectedPackage);
  });

  // Initialize the summary with the default/initially selected package
  var initialPackage = $('input[name="packageID"]:checked')
    .next(".name")
    .text();
  $("#summary-package").text(initialPackage || "None Selected"); // 'None Selected' is a placeholder
});

$("#summary-table").text($("#tableID").val());

// !Function to update total amount

function updateTotalAmount() {
  var totForFood = grandTotal;

  let total = baseCostPerPerson * parseInt($("#numOfPeople").val() || 1);

  let totalPrice = total + totForFood;

  $("#total-amount").text(`Rs.${totalPrice.toFixed(2)}`);
  $("#totalAmount").val(totalPrice.toFixed(2));
}

$(document).on("change", "#cartTotalAmount", function () {
  updateTotalAmount();
});

$(document).ready(function () {
  // Constants

  // Initialize the summary fields with the default values
  let selectedDate =
    $("#selectedDate").val() || new Date().toISOString().split("T")[0]; // Current date if not set
  let selectedPeople = $("#numOfPeople").val() || 1; // Default to 1 person if not set
  let selectedTime = $("#selectedTime").val() || "08:00"; // Default time if not set
  let selectedPackage =
    $('input[name="packageID"]:checked').next(".name").text() || "T1";

  // Update the summary fields
  $("#summary-date").text(selectedDate);
  $("#summary-people").text(selectedPeople);
  $("#summary-time").text(selectedTime);
  $("#summary-package").text(selectedPackage);

  // Call updateTotalAmount to set the initial total
  updateTotalAmount();

  // Event listeners for date, time, and people selections
  $(".date-slot, .time-slot, .person-icon").click(function () {
    // Update the summary fields and total amount whenever a selection is made
    selectedDate = $("#selectedDate").val();
    selectedPeople = $("#numOfPeople").val();
    selectedTime = $("#selectedTime").val();

    $("#summary-date").text(selectedDate);
    $("#summary-people").text(selectedPeople);
    $("#summary-time").text(selectedTime);
    updateTotalAmount();
  });

  // Add new menu items
  $("#add-item").click(function () {
    let newItemHtml = `
          <div class="menu-item">
              <span>Chicken fried rice</span>
              <span class="price">3000.00</span>
              <span class="remove-item">Remove</span>
          </div>
      `;
    $(".menu-items").append(newItemHtml);
    updateTotalAmount(); // Update total when a new item is added
  });

  // Remove menu items
  $(document).on("click", ".remove-item", function () {
    $(this).closest(".menu-item").remove();
    updateTotalAmount(); // Update total when an item is removed
  });
});

//!functions for reservation view page

function popViewReservationDetails(element) {
  var reservationID = element.getAttribute("data-reservation-id");
  var item = "";

  $.ajax({
    url: "getReservationDetails/" + reservationID,
    dataType: "json",
    success: function (response) {
      var reservationDetails = response;

      if (reservationDetails && reservationDetails.length > 0) {
        $("#reservation-details-container").show();
        $("#rs-order-id").text(reservationDetails[0].orderID || "N/A");
        $("#rs-subtotal").text(
          "LKR : " +
            (reservationDetails[0].amount -
              reservationDetails[0].numOfPeople * 500) +
            ".00" || "N/A"
        );
        $("#rs-order-date").text(reservationDetails[0].date || "N/A");
        // $("#rs-time").text(reservationDetails[0].reservationStartTime || 'N/A');
        $("#rs-reservation").text(
          "LKR : " + reservationDetails[0].numOfPeople * 500 + ".00" || "N/A"
        );
        // $("#rs-package").text(reservationDetails[0].packageID || 'N/A');
        $("#rs-Payable").text(
          "LKR" + reservationDetails[0].amount + ".00" || "N/A"
        );
        // $("#rs-status").text(reservationDetails[0].status || 'N/A');
        // $("#rs-table").text(reservationDetails[0].tableID || 'N/A');
        // $("#rs-customer").text(reservationDetails[0].customerID || 'N/A');
        var itemDiv = $(".rs-items");
        itemDiv.empty();
        reservationDetails[1].forEach((element) => {
          item += `<div class='rs-item-card'>
          <img src='${element.imagePath.replace(/\\\//g, "/")}' alt='item'>
          <div class='rs-item-details'>
            <table>
              <tr><td><p>Item Name: ${
                element.itemName
              }</p></td><td><p class='rs-item-price'>Item Price: Rs. ${
            element.price
          }.00</p></td></tr>
              <tr><td><p>Item Size: ${element.size}</p></td><td><p>Quantity: ${
            element.quantity
          }</p></td></tr>
            </table>
             <p class='rs-item-completed'>Completed</p>

            </div>
        </div>`;
        });
        itemDiv.append(item);
      } else {
        alert("No details available for this reservation.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching data:", error);
      alert("Failed to fetch reservation details: " + error);
    },
  });

  $(document).on("click", "#rs-close-btn", function () {
      $("#reservation-details-container").hide();
  });
}
