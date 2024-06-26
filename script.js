// To show or hide the nav
function showHideNav() {
    var nav = document.getElementById('navCategories');
    //if it is hidden, show. Else hide it
    if (nav.classList.contains('hide')) {
        nav.classList.remove('hide');
    } else {
        nav.classList.add('hide');
    }
}

//To just hide the nav, if it is visible
function hideNav() {
    var nav = document.getElementById('navCategories');
    //if the nav exists, hide it
    if (nav != null && !nav.classList.contains('hide')) {
        nav.classList.add('hide');
    }
}

//function to display the search results. If no query then it will display everything. Also displays by category
function displaySearchResults(category) {
    //first clear the page of any current searches, and hide the nav
    $('#result').empty();
    hideNav();

    if (category !== undefined && category !== null && category !== '') {
        // if the category is set, put the query as that category
        var query = category;
    } else {
        // use the search query
        var query = $('#searchQuery').val(); //get the search query
    }

    $.ajax({
        url: 'getCarsFromDB.php',
        type: 'GET',
        data: { query: query }, //send search query
        success: function (data) {
            var car;
            var content = '';
            if (data.length == 0) {
                $('#result').append('<p>No cars found.</p>');
            }
            else {
                for (var i = 0; i < data.length; i++) {
                    //set the current data and clear the content var
                    car = data[i];
                    content = '';

                    content += `<div class='productItem flex'>
                                    <img src='images/${car.image}' class='productItemImage'>
                                    <p class='productItemContent'><b>${car.brand} ${car.model}</b><br>
                                    <u>${car.type} | $${car.price_day} per day</u><br>
                                    ${car.seats} seats, ${car.transmission}, ${car.fuel_type}<br>
                                    Amount available: ${car.quantity}<br>
                                    Mileage: ${car.mileage}<br></p>`;
                    content += `<a href='reservations.php'>
                        <button class='rentBtn' type='button' id='${car.car_id}' onclick='saveUserSelection(${car.car_id})'`;

                    //if the quantity is 0, disable the button
                    if (car.quantity == 0) {
                        content += ' disabled';
                    }
                    content += `>Rent</button></a></div>`;

                    $('#result').append(content);
                }
            }
        },
        error: function (xhr, status, error) {
            $('#result').html('Error: ' + error);
        }
    });
}

//when the user selects a rent button, save their choice to the session.
function saveUserSelection(car_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "accessSession.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("carId=" + car_id);
}

//validate the email to also have a . in it
function validEmail() {
    var email = document.getElementById("email").value;

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Email address should have a . after the @");
        return false;
    }
}

//for the reservations page. Returns jsut one car object, and also adds span ids so that wanted values can be selected
function getCarDetails(chosenCarId) {
    $.ajax({
        url: 'getCarsFromDB.php',
        type: 'GET',
        data: { query: chosenCarId }, //send search query
        success: function (data) {
            var car = data[0];
            if (data.length == 0) {
                $('#result').append('<p>No cars found.</p>');
            }
            else {
                //set the current data and clear the content var
                car = data[0];
                $('#result').append(`<div class='productItem flex'>
                                    <img src='images/${car.image}' class='productItemImage'>
                                    <p class='productItemContent'><b>${car.brand} ${car.model}</b><br>
                                    <u>${car.type} | $<span id ='car_price'>${car.price_day}</span> per day</u><br>
                                    ${car.seats} seats, ${car.transmission}, ${car.fuel_type}<br>
                                    Amount available: <span id='car_quantity'>${car.quantity}</span><br>
                                    Mileage: ${car.mileage}<br></p>
                                </div>`);
            }
        },
        error: function (xhr, status, error) {
            $('#result').html('Error: ' + error);
        }
    });
}

function clearCarSelection() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "clearCarFromSession.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("carId=" + 1);
}