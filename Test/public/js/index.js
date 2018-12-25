$(function () {

    const catalog = $('.catalog');
    const userIdentifier = $('.user_identifier').html();
    firstStar();

    function firstStar() {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            dataType: "json",
            data: 'getAllProduct='
        }).done(function (response) {
            if (userIdentifier == 'admin') {
                createNewItemForAdmin(response);
            } else {
                createNewItem(response);
            }
        }).fail(function (jqXHR) {
            if (jqXHR.status === 404) {
                console.log('товара нет в наличии...');
            }
        });
    }

    $("a.sort").on('click', function (event) {
        const sortRequest = $(this).attr('id');
        const sortItem = $('.checked').text();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: 'handler.php',
            data: 'sort=' + sortItem
        }).done(function (response) {
            if (sortRequest == "priceSort") {
                sortByPrice(response);
            } else {
                sortByName(response);
            }
        }).fail(function () {
            console.log('товара нет в наличии...');
        });
    });

    $('.list-group').on('click', 'a', function () {
        const productName = $(this).text();
        document.title = productName;
        console.log(productName);
        $(this).toggleClass('checked').siblings().removeClass('checked');
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: 'handler.php',
            data: 'getProduct=' + productName
        }).done(function (response) {
            if (userIdentifier == 'admin') {
                createNewItemForAdmin(response);
            } else {
                createNewItem(response);
            }
        }).fail(function (jqXHR) {
            if (jqXHR.status === 404) {
                console.log('товара нет в наличии...');
            }
        });
    });

    catalog.on('click', '.delete_item', function (event) {
        const id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: 'deleteItem=' + id
        }).done(function (jqXHR) {
            const parentId = target.parent().attr('id');
            $(`#${id}`).remove();
        }).fail(function (jqXHR) {
            if (jqXHR.status === 400) {
                console.log('такого id не существует');
            }
        });
    });

    catalog.on('click', '.item__edit', function (event) {
        const id = $(this).parents('div').attr('id');
        const img = $(this).siblings('div.item__image').children('img').attr('src');
        const title = $(this).siblings('div.item__title').children('p.p__item__title').text();
        const price = $(this).siblings('div.item__price').children('p.p__item__price').text();
        const category = $(this).siblings('div.item__category').children('p.p__item__category').text();
        window.open(`editItem.php?id=${id}&img=${img}&title=${title}&price=${price}&category=${category}`, "", "width=700,height=850");
    });

    $('#logout').click(function () {
        $.post("handler.php", {logout: ""});
    });

    function sortByPrice(obj) {
        const sortedByAge = obj.sort(function (a, b) {
            return a.price - b.price;
        });
        if (userIdentifier == 'admin') {
            createNewItemForAdmin(sortedByAge);
        } else {
            createNewItem(sortedByAge);
        }
    }

    function sortByName(obj) {
        const sortByName = obj.sort(function (a, b) {
            return a.name - b.name;
        });
        if (userIdentifier == 'admin') {
            createNewItemForAdmin(sortByName);
        } else {
            createNewItem(sortByName);
        }
    }

    function createNewItem(response) {
        const $itemContainer = $('.catalog__item__container');
        $itemContainer.children().remove();
        for (let value in response) {
            $(`<div class="col-sm-3">
                    <div class="item">
                        <div class="item__image">
                            <img src="${response[value].img_src}" alt="">
                        </div>
                        <div class="item__title">
                               <p class="p__item__title">${response[value].name}</p>
                         </div>
                         <div class="item__price">
                              <p class="p__item__price">${response[value].price}</p>
                              <span>грн</span>
                        </div>
                     </div>
             </div>`).appendTo('.catalog__item__container');
        }
    }

    function createNewItemForAdmin(response) {
        const $itemContainer = $('.catalog__item__container');
        $itemContainer.children().remove();
        for (let value in response) {
            $(`<div class="col-sm-3 block__item">
                    <div class="item" id="${response[value].id}">
                        <div class="item__image">
                            <img src="${response[value].img_src}" alt="">
                        </div>
                        <div class="item__category">
                               <p class="p__item__category">${response[value].category}</p>
                         </div>
                        <div class="item__title">
                               <p class="p__item__title">${response[value].name}</p>
                         </div>
                         <div class="item__price">
                              <p class="p__item__price">${response[value].price}</p>
                              <span>грн</span>
                        </div>
                        <div class="item__delete">
                             <p class="delete_item" id="${response[value].id}">удалить</p>
                             
                        </div>
                        <div class="item__edit">
                              редактировать
                        </div>
                        <div class="item__id" style="display: none">${response[value].id}</div>
                     </div>
             </div>`).appendTo('.catalog__item__container');
        }
    }
});
