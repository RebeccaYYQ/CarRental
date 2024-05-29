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
    if (!nav.classList.contains('hide')) {
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
                    content += `<button class='rentBtn' type='button' id='${car.car_id}' onclick='saveUserSelection(${car.car_id})'`;
                    
                    //if the quantity is 0, disable the button
                    if (car.quantity == 0) {
                        content += ' disabled';
                    }
                    content += `>Rent</button></div>`;
                    
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