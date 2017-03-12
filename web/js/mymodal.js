// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('my-modal');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
if (img){
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
}
// When the user clicks on modal, close the modal
if (modal){
modal.onclick = function() {
    modal.style.display = "none";
}
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function(){

$('.thumb').css('display','none');
$('.thumb:lt(7)').css('display','block');

//left arrow
$('#right-multi-media').click(function(){  
    if($('.thumb:first').is(':hidden')) {
    $('.thumb:visible:first').prev().css('display','block');
    $('.thumb:visible:last').css('display','none');
}
});

//right arrow
$('#left-multi-media').click(function(){
    if($('.thumb:last').is(':hidden')) {
    $('.thumb:visible:last').next().css('display','block');
    $('.thumb:visible:first').css('display','none');  
}
});

$('.thumb').mouseover(function(){
    $(this).find('.magnifier').show();
    $(this).find('.media-description').show();
});$('.thumb').mouseleave(function(){
    $(this).find('.magnifier').hide();
    $(this).find('.media-description').hide();
});

});


