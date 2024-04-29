//HEADER-------------------------------------------------------------------

// Menu burger (version mobile et tablet)---------------------

mobileNav = document.querySelector(".mobile__nav__wrapper");
mobileNavClass = mobileNav.classList;

// ouvre et ferme menu
menuIcon = document.querySelector(".burger__icon")
menuIconClass = menuIcon.classList;
menuIcon.addEventListener("click", () => {
    mobileNavClass.toggle("display__mobile__nav");
    menuIconClass.toggle("fa-xmark");
    menuIconClass.toggle("fa-bars");
});


 // on récupère le chemin vers l'url ajax à injecter
 let loc = window.location.pathname;
 loc = loc.replace("index.php", "")
 
 //fonction pour éviter les doublons
 var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();


//recherche du nom d'un avocat----------------------------------------------------
$(document).ready(function(){
    let name;
    $('#name__search__input').keyup(function(){
        $('#name__search__results').html("")
        delay(function(){
            
           
            name = $('#name__search__input').val()
        
         
            
            if(name != "") {
                $.ajax({
                    type:'GET',
                    url: loc + "Ajax/searchLawyerAjaxGet.php",
                    data: 'name=' + encodeURIComponent(name),
                    success: function(data) {
                        if(data != "") {
                            $('#name__search__results').append(data)
                            $(".name__item").each(function() {
                                $(this).click(function()  {
                                    $('#name__search__input').val($(this).html().trim());
                                    $('#name__search__results').html('')
                                    data = "";
                                })
                            })
                        } else {
                            $('#name__search__results').html("<ul class ='ajax__results__list'><li >Aucun avocat avec ce nom n'est enregistré</li></ul>")
                        }
                    }
                })
            }
        }, 300)
    })
    
    //recherche de la ville d'un avocat -------------------------------------------
    $('#city__search__input').keyup(function(){
        let city

        $('#city__search__results').html('')
        delay(function(){
    
            city = $('#city__search__input').val()
        
            if(city != "") {

                $.ajax({
                    type:'GET',
                    url: loc + "Ajax/searchLawyerAjaxGet.php",
                    data: 'city=' + encodeURIComponent(city),
                    success: function(data) {
                        if(data != "") {
                            $('#city__search__results').append(data)
                            $(".city__item").each(function() {
                                $(this).click(function()  {
                                    $('#city__search__input').val($(this).html().trim());
                                    $('#city__search__results').html('')
                                    data = "";
                                })
                            })
                        }else {
                            $('#city__search__results').html("<ul class ='ajax__results__list'><li >Aucun résultat pour cette ville</li></ul>")
                        }
                    }
                })
            }
        }, 300)
    })

    //soumission du formulaire------------------------------------------------------
    $('#submit__search__input').click(function(){ 
        $('#lawyers__search__results__global__wrapper').html("");

        let name = $('#name__search__input').val();
        let city = $('#city__search__input').val();
        name = name.replace(' ', '_');
        city = city.replace(' ', '_');
        
        $.post(
            loc + "Ajax/searchLawyerAjaxPost.php", 
            {
                name: name, city : city
            },
            function(data, status) {
                if(data != "") {
                 
                    $('#lawyers__search__results__global__wrapper').append(data)
                }else {
                    $('#lawyers__search__results__global__wrapper').html("<p>Aucun résultat pour cette recherche</p>")
                }
            }
        )
    })

    //pagination-----------------------------------------------------
    function loadTable(page) {
        let name = $('#name__search__input').val();
        let city = $('#city__search__input').val();
        name = name.replace(' ', '_');
        city = city.replace(' ', '_');

        $.ajax({
            
            url :  loc + "Ajax/searchLawyerAjaxPost.php",
            type :'POST', 
            data : {page_no : page, name: name, city : city},
            success : function (data) {
               
                $('#lawyers__search__results__global__wrapper').html(data)
            }
        })
    }

    $(document).on("click", "#pagination a", function(e) {
        e.preventDefault();
        let pageId = $(this).attr("id")
        document.getElementById("submit__search__input").scrollIntoView({behavior:"smooth"})
        loadTable(pageId)
        
    })

    $(document).on("click", ".previous__link", function(e) {
        e.preventDefault();
        let pageId = $(this).attr("id")
        loadTable(pageId)
        
    })

    let path = window.location.href
        path = path.replace("index.php?page=bars", "")
    //recherche de la ville d'un bareau -------------------------------------------
    $('#bars__search__input').keyup(function(){
        let city
        $('#city__bars__search__results').html('')

        delay(function(){
    
            city = $('#bars__search__input').val()
        
            if(city != "") {

                $.ajax({
                    type:'GET',
                    url: path + "Ajax/searchBarsAjax.php",
                    data: 'city=' + encodeURIComponent(city),
                    success: function(data) {
                        if(data != "") {
                            $('#city__bars__search__results').append(data)
                            $(".city__item").each(function() {
                                $(this).click(function()  {
                                    $('#bars__search__input').val($(this).html().trim().toUpperCase());
                                    $('#city__bars__search__results').html('')
                                    data = "";
                                })
                            })
                        }else {
                            $('#city__bars__search__results').html("<ul class ='ajax__results__list'><li >Aucun résultat pour cette ville</li></ul>")
                        }
                    }
                })
            }
        }, 300)
    })
    //soumission du formulaire de recherche de barreau----------------------------------------
    $('#submit__bars__search__input').click(function(){ 
        $('#bars__search__results__global__wrapper').html("");

        
        let city = $('#bars__search__input').val();
        city = city.replace(' ', '_');
        
        $.post(
            path + "Ajax/searchBarsAjax.php",
            {
                city : city
            },
            function(data, status) {
                if(data != "") {
                 
                    $('#bars__search__results__global__wrapper').append(data)
                }else {
                    $('#bars__search__results__global__wrapper').html("<p>Aucun résultat pour cette recherche</p>")
                }
            }
        )
    })
})