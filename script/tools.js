let mainNav = document.getElementById('jsMenu');
let navbarResponsive = document.getElementById('jsNavbarResponsive');

navbarResponsive.addEventListener('click', function(){

    mainNav.classList.toggle('active');
});

var date = document.querySelector('[type=date]');

function closedDate(e){
    var day = new Date( e.target.value ).getDay();

    if( day == 0){
        e.target.setCustomValidity('Vi har tyvärr stängt på söndagar. Vi öppnar igen på tisdag.');
    }

    if( day == 1){
        e.target.setCustomValidity('Vi har tyvärr stängt på måndagar. Vi öppnar igen på tisdag.');
    }

    if (day == 2){
        e.target.setCustomValidity('Vi har tyvärr stängt på tisdagar. Vi öppnar igen på Tisdag.');
    }

    else{
        e.target.setCustomValidity('');
    }
}

date.addEventListener('input',closedDate);