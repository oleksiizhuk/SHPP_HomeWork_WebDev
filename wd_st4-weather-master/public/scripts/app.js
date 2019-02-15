$(function () {

    const forecast = $(".forecast");
    const divCurrentWeather = $(".all-50").first();
    loadWeather($('nav a.active').text());

    $('nav a').on('click', function (event) {
        event.stopPropagation();
        $('nav a.active').removeClass();
        $(this).addClass("active");
        const choice = $(this).text();
        loadWeather(choice);
    });

    function loadWeather(argument) {
        $.ajax({
            type: 'GET',
            dataType: 'Json',
            url: '../core/handler.php',
            data: {
                function: argument
            }
        }).done(function (res) {
            constructor(res);
        }).fail(function (res) {
            console.error("fail" + res);
        });
    }

    function constructor(argument) {
        const day = getDay(argument[0].date);
        const temperature = argument[0].temperature;
        createHeaderWeather(day, temperature);
        forecast.empty();
        for (let value in argument) {
            createTable(argument[value].temperature, convertTime(argument[value].date), argument[value].icon);
        }
    }

    function createTable(temperature, processedTime, icon) {
        $($("<div/>")
            .addClass("hourly-forecast clearfix")
        )
            .append($("<div/>")
                .addClass("forecast-date")
                .text(processedTime)
            )
            .append($("<div/>")
                .addClass("forecast-weather")
                .append($("<div/>")
                    .addClass("forecast-temperature")
                    .text(`${temperature}°`)
                )
                .append($("<div/>")
                    .addClass('forecast-icon')
                    .attr('height', "30px")
                    .attr('width', "30px")
                    .append(
                        ($("<object/>", {
                            type: "image/svg+xml",
                            width: "35px",
                            fill: "#fff"
                        })).attr("data", `img/icons/${icon}.svg`).attr("id", `${icon}`)
                            .append($("<param/>)", {fill: "#fff", name: `${icon}`, value: `img/icons/${icon}.svg`}))
                    )
                )
            )
            .appendTo(forecast);
    }

    function createHeaderWeather(currentDay, currentTemperature) {
        divCurrentWeather.empty();
        $(` <div class="date"> ${currentDay} </div>
            <div class="current-temperature"> ${currentTemperature}°</div>;          
        `).appendTo(divCurrentWeather);
    }

    function convertTime(argument) {
        const options = {
            hour12: false,
            hour: "numeric",
            minute: 'numeric'
        };
        const time = new Date(argument);
        const processedTime = time.toLocaleString('en', options).replace(/AM|PM/gi, "");
        return processedTime
    }

    function getDay(arg) {
        const objDate = new Date(arg);
        const options = {
            weekday: 'short',
            day: 'numeric',
            month: 'numeric'
        };
        const ressult = objDate.toLocaleString('en', options);
        return ressult;
    }
});