// To show or hide the nav
function showHideNav() {
    var nav = document.getElementById('navCategories');
    //if it is visible, hide. Else show
    if (nav.classList.contains('hide')) {
        nav.classList.remove('hide');
    } else {
        nav.classList.add('hide');
    }
}

//function to display the search results. If no query then it will display everything. Also displays by category
function displaySearchResults(category) {
    //first clear the page of any current searches
    $('#result').empty();

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
            if (data.length == 0) {
                $('#result').append('<p>No cars found.</p>');
            }
            else {
                for (var i = 0; i < data.length; i++) {
                    car = data[i];
                    $('#result').append(`<div class='productItem flex'>
                                        <img src='images/${car.image}' class='productItemImage'>
                                        <p class='productItemContent'><b>${car.brand} ${car.model}</b><br>
                                            <u>${car.type} | $${car.price_day} per day</u><br>
                                            ${car.seats} seats, ${car.transmission}, ${car.fuel_type}<br>
                                            Amount available: ${car.quantity}<br>
                                            Mileage: ${car.mileage}<br></p>
                                        <button class='rentBtn' type='button'>Rent</button>
                                    </div>`);
                }
            }
        },
        error: function (xhr, status, error) {
            $('#result').html('Error: ' + error);
        }
    });
}