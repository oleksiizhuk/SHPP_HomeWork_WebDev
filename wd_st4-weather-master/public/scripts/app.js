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
            console.log("done" + res);
            switch (argument) {
                case 'API':
                    constructorApi(res);
                    break;
                case 'Database':
                    constructorDataBase(res);
                    break;
                case 'JSON':
                    constructorJson(res);
                    break;
                default:
                    console.error("ERR CHOICE");
            }
        }).fail(function (res) {
            console.error("fail" + res);
        });
    }

    function constructorJson(argument) {
        console.log(argument);
        const day = getDay(argument[0].date);
        const temperature = convertKelvinToCelsius(argument[0].temperature);
        createHeaderWeather(day, temperature);
        forecast.empty();
        for (let value in argument) {
            createTable(convertKelvinToCelsius(argument[value].temperature), convertTime(argument[value].date));
        }
    }

    function constructorDataBase(argument) {
        console.log(argument);
        const day = getDay(argument[0].timestamp);
        const temperature = argument[0].temperature;
        createHeaderWeather(day, temperature);
        forecast.empty();
        for (let value in argument) {
            createTable(argument[value].temperature, convertTime(argument[value].timestamp));
        }
    }

    function constructorApi(argument) {
        const day = getDay(argument[0].DateTime);
        const temperature = ConverterFahrenheitToCelsius(argument[0].Temperature.Value);
        createHeaderWeather(day, temperature);
        forecast.empty();
        for (let value in argument) {
            const processedTime = convertTime(argument[value].DateTime);
            const temperature = ConverterFahrenheitToCelsius(argument[value].Temperature.Value);
            createTable(temperature, processedTime);
        }
    }

    function createTable(temperature, processedTime, svgPath) {
        $(`
            <div class="hourly-forecast clearfix" </div>;
        `)
            .append(
                $("<div/>")
                    .addClass("forecast-date")
                    .text(processedTime)
            )
            .append(
                $("<div/>")
                    .addClass("forecast-weather")
                    .append(
                        $("<div/>")
                            .addClass("forecast-temperature")
                            .text(`${temperature} °`)
                    )
                    .append(
                        $("<div/>")
                            .addClass('forecast-icon')
                            .append(
                                `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.85 34.85" style="enable-background:new 0 0 34.85 34.85;" xml:space="preserve" fill="#fff"> <g> <path d="M17.424,26.788c-5.163,0-9.363-4.2-9.363-9.363c0-5.164,4.2-9.364,9.363-9.364s9.363,4.201,9.363,9.364 C26.788,22.588,22.587,26.788,17.424,26.788z M17.424,9.061c-4.611,0-8.363,3.752-8.363,8.364c0,4.611,3.752,8.363,8.363,8.363 s8.363-3.752,8.363-8.363C25.788,12.813,22.036,9.061,17.424,9.061z"></path> <g> <path d="M17.424,4.982c-0.276,0-0.5-0.224-0.5-0.5V0.5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v3.982 C17.924,4.759,17.701,4.982,17.424,4.982z"></path> <path d="M17.424,34.85c-0.276,0-0.5-0.224-0.5-0.5v-3.982c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v3.982 C17.924,34.626,17.701,34.85,17.424,34.85z"></path> </g> <g> <path d="M4.482,17.925H0.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3.981c0.276,0,0.5,0.224,0.5,0.5 S4.758,17.925,4.482,17.925z"></path> <path d="M34.349,17.925h-3.982c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3.982c0.276,0,0.5,0.224,0.5,0.5 S34.625,17.925,34.349,17.925z"></path> </g> <g> <path d="M8.274,8.771c-0.128,0-0.256-0.049-0.354-0.146L5.104,5.811c-0.195-0.195-0.195-0.512,0-0.707s0.512-0.195,0.707,0 l2.816,2.814c0.195,0.195,0.195,0.512,0,0.707C8.53,8.723,8.402,8.771,8.274,8.771z"></path> <path d="M29.393,29.893c-0.128,0-0.256-0.049-0.354-0.146l-2.816-2.817c-0.195-0.195-0.195-0.512,0-0.707s0.512-0.195,0.707,0 l2.816,2.817c0.195,0.195,0.195,0.512,0,0.707C29.649,29.844,29.521,29.893,29.393,29.893z"></path> </g> <g> <path d="M5.458,29.893c-0.128,0-0.256-0.049-0.354-0.146c-0.195-0.195-0.195-0.512,0-0.707l2.816-2.817 c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707l-2.816,2.817C5.713,29.844,5.585,29.893,5.458,29.893z"></path> <path d="M26.577,8.771c-0.128,0-0.256-0.049-0.354-0.146c-0.195-0.195-0.195-0.512,0-0.707l2.816-2.814 c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707L26.93,8.625C26.833,8.723,26.705,8.771,26.577,8.771z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
                        </svg>`
                            )
                    )
            )
            .appendTo(forecast);
    }

    function createHeaderWeather(currentDay, currentTemperature) {
        divCurrentWeather.empty();
        $(`
            <div class="date"> ${currentDay} </div>
            <div class="current-temperature"> ${currentTemperature}°</div>;          
        `).appendTo(divCurrentWeather);
    }

    function ConverterFahrenheitToCelsius(Fahrenheit) {
        return Math.round((Fahrenheit - 32) / 1.8);
    }

    function convertKelvinToCelsius(kelvin) {
        return Math.round((kelvin - 273.15));
    }

    function choiceIcon(temperature) {

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

    /*function convertTimestampToTime(timestamp) {
        const date = new Date(timestamp * 1000);
        const hours = date.getHours();
        const minutes = "0" + date.getMinutes();
        const formattedTime = hours + ':' + minutes;
        return formattedTime;
    }*/

    /*   function createTableTest(argument) {
           let obj = $('.forecast-weather');
           //forecast.empty();

           for (let value in argument) {
               console.log(value + "  " + argument[value].temperature);
               const temperature = argument[value].temperature;
               const processedTime = converTime(argument[value].timestamp);
               console.log("time - " + processedTime);
               const divForecast = $(`
                         <div class="hourly-forecast clearfix" </div>;
               `)
                   .append(
                       $("<div/>")
                           .addClass("forecast-date")
                           .text(processedTime)
                   )
                   .append(
                       $("<div/>")
                           .addClass("forecast-weather")
                           .append(
                               $("<div/>")
                                   .addClass("forecast-temperature")
                                   .text(`${temperature} °`)
                           )
                           .append(
                               $("<div/>")
                                   .addClass('forecast-icon')
                                   .append(
                                       `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.85 34.85" style="enable-background:new 0 0 34.85 34.85;" xml:space="preserve" fill="#fff"> <g> <path d="M17.424,26.788c-5.163,0-9.363-4.2-9.363-9.363c0-5.164,4.2-9.364,9.363-9.364s9.363,4.201,9.363,9.364 C26.788,22.588,22.587,26.788,17.424,26.788z M17.424,9.061c-4.611,0-8.363,3.752-8.363,8.364c0,4.611,3.752,8.363,8.363,8.363 s8.363-3.752,8.363-8.363C25.788,12.813,22.036,9.061,17.424,9.061z"></path> <g> <path d="M17.424,4.982c-0.276,0-0.5-0.224-0.5-0.5V0.5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v3.982 C17.924,4.759,17.701,4.982,17.424,4.982z"></path> <path d="M17.424,34.85c-0.276,0-0.5-0.224-0.5-0.5v-3.982c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v3.982 C17.924,34.626,17.701,34.85,17.424,34.85z"></path> </g> <g> <path d="M4.482,17.925H0.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3.981c0.276,0,0.5,0.224,0.5,0.5 S4.758,17.925,4.482,17.925z"></path> <path d="M34.349,17.925h-3.982c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3.982c0.276,0,0.5,0.224,0.5,0.5 S34.625,17.925,34.349,17.925z"></path> </g> <g> <path d="M8.274,8.771c-0.128,0-0.256-0.049-0.354-0.146L5.104,5.811c-0.195-0.195-0.195-0.512,0-0.707s0.512-0.195,0.707,0 l2.816,2.814c0.195,0.195,0.195,0.512,0,0.707C8.53,8.723,8.402,8.771,8.274,8.771z"></path> <path d="M29.393,29.893c-0.128,0-0.256-0.049-0.354-0.146l-2.816-2.817c-0.195-0.195-0.195-0.512,0-0.707s0.512-0.195,0.707,0 l2.816,2.817c0.195,0.195,0.195,0.512,0,0.707C29.649,29.844,29.521,29.893,29.393,29.893z"></path> </g> <g> <path d="M5.458,29.893c-0.128,0-0.256-0.049-0.354-0.146c-0.195-0.195-0.195-0.512,0-0.707l2.816-2.817 c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707l-2.816,2.817C5.713,29.844,5.585,29.893,5.458,29.893z"></path> <path d="M26.577,8.771c-0.128,0-0.256-0.049-0.354-0.146c-0.195-0.195-0.195-0.512,0-0.707l2.816-2.814 c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707L26.93,8.625C26.833,8.723,26.705,8.771,26.577,8.771z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
                           </svg>`
                                   )
                           )
                   )
                   .appendTo(forecast);

           }
       }*/
});