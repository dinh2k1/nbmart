$(document).ready(function(){

    // Load more data
    $('.load-more').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
		var order_by = document.getElementById("order_by").value;
		var where = document.getElementById("where").value;
        row = row + 15;

        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getData.php',
                type: 'post',
                data: {row:row,
					  order_by:order_by,
					  where:where},
				
						
                beforeSend:function(){
                    $(".load-more").text("Đang tải...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $(".post:last").after(response).show().fadeIn("slow");

                        var rowno = row + 15;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more').text("Thu gọn");
                            $('.load-more').css("background","darkorchid");
                        }else{
                            $(".load-more").text("Xem thêm");
                        }
                    }, 2000);


                }
            });
        }else{
            $('.load-more').text("Đang tải...");

            // Setting little delay while removing contents
            setTimeout(function() {

                // When row is greater than allcount then remove all class='post' element after 12 element
                $('.post:nth-child(15)').nextAll('.post').remove().fadeIn("slow");

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Xem thêm");
                $('.load-more').css("background","#15a9ce");

            }, 2000);


        }

    });

});