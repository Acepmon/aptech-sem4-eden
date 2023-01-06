$(function() { 
 var sticky_navigation_offset_top = $('.menu').offset().top;     
 var sticky_navigation = function(){
 var scroll_top = $(window).scrollTop();
 if (scroll_top > sticky_navigation_offset_top) {
  $('.menu').css({ 'position': 'fixed', 'top':0, 'left':0 });
 } else {
  $('.menu').css({ 'position': 'relative' });
 }  
 };
 sticky_navigation();     
 $(window).scroll(function() {
 sticky_navigation();
 }); 
});

function showComm() {
    document.getElementById('hide').style.display = 'block';
    document.getElementById('show').style.display = 'none';
    document.getElementById('commentContainers').style.display = 'block';
}
function hideComm() {
    document.getElementById('show').style.display = 'block';
    document.getElementById('hide').style.display = 'none';
    document.getElementById('commentContainers').style.display = 'none';
}
