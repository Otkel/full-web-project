let start = 0;
let leftItems = true;
$("#show-other-items").hover(
    function () {
        $(".fa-refresh").addClass("rotating");
    },
    function () {
        $(".fa-refresh").removeClass("rotating");
    }

);
$("#show-other-items").click(
    function () {

        if(leftItems){
        fetch('../ajaxItems.php',
            {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "GET",
                offset : 9
            }
        )
            .then(
                function(response) {
                    if (response.status !== 200) {
                        console.log('Looks like there was a problem. Status Code: ' +
                            response.status);
                        return;
                    }
                    console.log(response);

                    // Examine the text in the response
                    response.json().then(function(data) {
                        console.log(data);
                        if(data.length - start <= 0){
                            leftItems = false;
                        }
                        if(leftItems){
                        /* getting row */
                        let row = [];
                        for (let i = start; i < start + 3 ; i++ ){
                            row.push(data[i]);
                        }
                        start+=3;
                        console.log(start);
                        /*ended getting row */
                        /* inserting row*/
                        $(".items-wrapper").append(
                            `
                                <div class="items-row eightyWidth flexCenter">
                                    <div class="items-element thirtyWidth fullHeight flexCenter  relative" >
                                        <img src="`+row[0].photoUrl+`" alt="">
                                        <div class="item-description seventyWidth pt-sans">
                                            <p>`+row[0].description+`</p>
                                        </div>
                                        <div class="item-price absolute circle redish-background flexCenter ">
                                            <p>`+row[0].price+`</p>
                                        </div>
                                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="items-element thirtyWidth fullHeight flexCenter  relative" ">
                                        <img src="`+row[1].photoUrl+`" alt="">
                                        <div class="item-description seventyWidth pt-sans">
                                            <p>`+row[1].description+`</p>
                                        </div>
                                        <div class="item-price absolute circle redish-background flexCenter ">
                                            <p>`+row[1].price+`</p>
                                        </div>
                                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="items-element thirtyWidth fullHeight flexCenter  relative" >
                                        <img src="`+row[2].photoUrl+`" alt="">
                                        <div class="item-description seventyWidth pt-sans">
                                            <p>`+row[2].description+`</p>
                                        </div>
                                        <div class="item-price absolute circle redish-background flexCenter ">
                                            <p>`+row[2].price+`</p>
                                        </div>
                                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            `
                        );}
                        /* ended inserting row*/
                        /* enlarging div to new row*/
                        /*
                        let height = parseInt($(".items-wrapper").css("height")) + 400;
                        $(".items-wrapper").css("height",height+"px");*/
                        /* ended enlarging*/
                        console.log(data);
                    });
                }
            )
            .catch(function(err) {
                console.log('Fetch Error :-S', err);
            });
    }

            if(!leftItems){
                $(".items-wrapper").append(`
                    <div class="flexCenter no-items-left fullWidth"> 
                        <p>no items left!</p>
                    </div>
                `);
                }


    }
);