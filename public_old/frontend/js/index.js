$(document).ready(function() {

  var appurl=$('#appurl').val();
  $('.some-list-2').simpleLoadMore({
    item: '.cars-box',
    count: 12,
    counterInBtn: true,
      btnHTML: '<button class="btn btn-primary float-end py-2 px-5">Load More {showing}/{total}</button>',
  });

  $('.brands-list').simpleLoadMore({
    item: '.brands-box',
    count: 12,
    counterInBtn: true,
      btnHTML: '<a href="#" class=" fw-bold"><small>More></small></a>',
  });

  $('.brands-list-footer').simpleLoadMore({
    item: '.brands-box-footer',
    count: 12,
    counterInBtn: true,
      btnHTML: '<a href="#" class=" fw-bold"><small>More></small></a>',
  });



  $('.send-offer').click(function() {

    var button = $(this);
    var rowData = button.closest('.row');

    var name = rowData.data('name');
    var photo = rowData.data('photo');
    var location = rowData.data('location');
    var mileage = rowData.data('mileage');
    var transmission = rowData.data('transmission');
    var fuel = rowData.data('fuel');
    var steering = rowData.data('steering');
    var body = rowData.data('body');
    var seat = rowData.data('seat');
    var engine = rowData.data('engine');
    var model = rowData.data('model');
    var door = rowData.data('door');
    var color = rowData.data('color');
    var price=rowData.data('price');
    var car_id=rowData.data('car_id');
    var status=rowData.data('status');




    // Do something with the captured data values

    $('#name').text(name);
    $('#listing_name').val(name);
    $('#car_listing_price').val(price);
    $('#id_car').val(car_id);
    $('#location').text(location);
    $('#mileage').text(mileage);
    $('#fuel').text(fuel);
    $('#transmission').text(transmission);
    $('#steering').text(steering);
    $('#body').text(body);
    $('#seats').text(seat);
    $('#engine').text(engine);
    $('#model').text(model);
    $('#doors').text(door);
    $('#color').text(color);
    $('#price').text('$'+price);
    $('#fob_price').val(price);
    $('#total').text(price);
    $('#car_id').val(car_id);
    $('#status_value').text(status);
    var domain = window.location.origin;
    $('#photo').attr('src', appurl + '/uploads/listing_featured_photos/' + photo);

  });

  $('#exampleModal1').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var targetedDiv = button.closest('div[data-name][data-img][data-review]'); // Targeted div

    // Extract the data values
    var name = targetedDiv.data('name');
    var img = targetedDiv.data('img');
    var review = targetedDiv.data('review');
    var car_name = targetedDiv.data('car_name');
    var date = targetedDiv.data('time');



    var domain = window.location.origin;


    // Update the modal content
    var modal = $(this);
    modal.find('.modal-title').text('Customer Review');
    modal.find('#review-img').attr('src', domain + '/uploads/listing_featured_photos/' + img);
    modal.find('.modal-body #review-description').text(review);
    modal.find('#username').text(name);
    modal.find('#short-img').attr('src', appurl + '/uploads/listing_featured_photos/' + img);
    modal.find('#car').attr('src', appurl + '/uploads/listing_featured_photos/' + img);
    modal.find('#car_name').text(car_name);
    modal.find('#created_at').text(date);




  });


  $('#main_filter_icon').click(()=>{

    function rotateElement() {
        $("#main_filter_icon").animate({ rotate: '+=180deg' }, 'fast');
        $("#main_filter_body").slideToggle();
  }
  rotateElement();
 });

 $('#home_filter_icon').click(() => {
  function rotateElement1() {
    $("#home_filter_icon").rotate({ angle: 0, animateTo: 180 });
    $("#homefilter-body").slideToggle();
  }
  rotateElement1();
});

});

  // Reset modal content on modal close






//   var currentIndex = 0;
//   var imagesCount = $('.thumbnail').length;

//   $('.thumbnail').click(function() {
//     var imageUrl = $(this).find('img').attr('src');
//     changeBigSlide(imageUrl);
//   });

//   $('.slider-arrow.prev').click(function() {
//     currentIndex = (currentIndex - 1 + imagesCount) % imagesCount;
//     var imageUrl = $('.thumbnail').eq(currentIndex).find('img').attr('src');
//     changeBigSlide(imageUrl);
//   });

//   $('.slider-arrow.next').click(function() {
//     currentIndex = (currentIndex + 1) % imagesCount;
//     var imageUrl = $('.thumbnail').eq(currentIndex).find('img').attr('src');
//     changeBigSlide(imageUrl);
//   });

//   function changeBigSlide(imageUrl) {
//     $('.big-slide img').attr('src', imageUrl);
//   }
// });



