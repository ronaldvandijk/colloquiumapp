document.addEventListener("DOMContentLoaded", function(event) {
    var cities = document.querySelector('#cities'),
        buildings = document.querySelector('#buildings'),
        rooms = document.querySelector('#rooms'),
        submitButton = document.querySelector('#btn__submit'),
        loading = document.querySelector('#loading'),
        roomSelected = false;


    hideLoadingIcon();
    addEvents();

    // Do a check if everything is set
    // else disable the save button
    if(buildings.innerHTML == "" || rooms.innerHTML == "") {
        disableSubmitButton();
        getBuildings();
    }

    // AXIOS get buildings based on locations
    function getBuildings() {
        buildings.innerHTML = "";
        rooms.innerHTML = "";

        disableSubmitButton();

        showLoadingIcon();
        axios.get('/api/buildings/' + cities.value)
            .then(function(res) {
                if(res.data.length > 0) {
                    res.data.forEach(function(item) {

                        var option = document.createElement('option');
                        option.value = item.id;
                        option.innerText = item.name;

                        buildings.appendChild(option);

                    });
                } else {
                    alert("Geen gebouwen beschikbaar");
                }
                hideLoadingIcon();
            }).catch(function(err) {
            console.log(err);
            alert(err);
        });
    }


    // Axios get rooms based on location
    function getRooms() {
        showLoadingIcon();
        disableSubmitButton();

        // Clean the contents of Rooms
        rooms.innerHTML = "";

        axios.get('/api/rooms/' + buildings.value)
            .then(function(res) {
                res.data.forEach(function(item) {

                    var option = document.createElement('option');
                    option.value = item.id;
                    option.innerText = item.name;

                    rooms.appendChild(option);
                });
                hideLoadingIcon();
            }).catch(function(err){
            console.log(err);
            alert(err);
        });

    }

    function showLoadingIcon() {
        loading.style.display = "block";
    }

    function hideLoadingIcon() {
        loading.style.display = "none";
    }

    function disableSubmitButton()
    {
        submitButton.disabled = true;
    }

    function enableSubmitButton()
    {
        submitButton.disabled = false;
    }

    //
    function addEvents() {
        cities.addEventListener('click', function (event) {
           getBuildings();
        });

        buildings.addEventListener('click', function(event){
           getRooms();
        });

        rooms.addEventListener('click', function(event) {
            enableSubmitButton();
        });
    }
});