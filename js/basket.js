let items = localStorage.getItem("data");
let amountOfItems  = '#amountOfItems';
let itemPhoto = '#itemPhoto';
let textP = '.text-basket p';
if(items!=""){
    items = JSON.parse(items);
    //console.log("not Empty!");
    for(i=0;i<items.length;i++)
    {
        let element = items[i];
        $('#basketDropdown').append(
            `
            <div id="item`+element.id+`" class="dropdown-element">
            <img src="`+element.itemPhoto+`" alt="" width="50px">
             <p>`+
            element.itemText
            +`</p> <button itemId="`+element.id+`" onclick="removeItem(this)" class="button button3">X</button>
            </div>
        `
        );
        //console.log(items[i]);
    }
    $(amountOfItems).text(items.length);
}
else {
    items = [];
    localStorage.setItem("data",JSON.stringify(items));
}
$('.add-to-basket').click(
    function () {
        let id = items.length;
        let photoUrl = $(this).siblings("img").attr('src');
        let itemText = $(this).siblings(".item-description").children("p").text().substr(0, 50);
        items.push(
            {
                "itemPhoto" :  photoUrl,
                "itemText" : itemText,
                "id" : id
            });
        localStorage.setItem("data",JSON.stringify(items));

        $('#basketDropdown').append(
        `
            <div id="item`+id+`" class="dropdown-element">
            <img src="`+photoUrl+`" alt="" width="100px">
             <p>`+
                itemText
             +`</p> <button itemId="`+id+`" onclick="removeItem(this)" class="button button3">X</button>
            </div>
        `
        );

        $(amountOfItems).text(parseInt($(amountOfItems).text())+1);
    }
);
function removeItem(item) {
    let itemId = $(item).attr('itemId');
    //console.log($(item).attr('itemId'));
    items.splice(itemId);
    localStorage.setItem("data",JSON.stringify(items));

    $("#item"+itemId).remove();
    $(amountOfItems).text(parseInt($(amountOfItems).text())-1);
}