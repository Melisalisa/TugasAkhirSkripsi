(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Sidebar Toggler
    $(".sidebar-toggler").click(function () {
        $(".sidebar, .content").toggleClass("open");
        return false;
    });

    // Progress Bar
    $(".pg-bar").waypoint(
        function () {
            $(".progress .progress-bar").each(function () {
                $(this).css("width", $(this).attr("aria-valuenow") + "%");
            });
        },
        { offset: "80%" }
    );

    // Calender
    $("#calender").datetimepicker({
        inline: true,
        format: "L",
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav: false,
    });

    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["...", "...", "...", "...", "...", "...", "..."],
            datasets: [
                {
                    label: "Hasil :",
                    data: [0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: "rgba(0, 156, 255, .7)",
                },
            ],
        },
        options: {
            responsive: true,
        },
    });

    var urlRank = "/getRank";

    fetch(urlRank)
        .then(function (response) {
            return response.json(); // Mengonversi respons menjadi JSON
        })
        .then(function (serverData) {
            // Tangani respons dari server

            // Perbarui data label dan data grafik batang
            myChart1.data.labels = serverData.map(function (item) {
                return item.alternatif; // Ubah sesuai dengan nama kolom untuk label
            });
            myChart1.data.datasets[0].data = serverData.map(function (item) {
                return item.hasil; // Ubah sesuai dengan nama kolom untuk nilai
            });

            // Perbarui grafik batang
            myChart1.update();
        })
        .catch(function (error) {
            // Tangani kesalahan jika ada
            console.log(error);
        });

    // Pie Chart
    var ctx5 = $("#pie-chart").get(0).getContext("2d");
    var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(0, 156, 255, .7)",
                        "rgba(0, 156, 255, .6)",
                        "rgba(0, 156, 255, .5)",
                        "rgba(0, 156, 255, .4)",
                        "rgba(0, 156, 255, .3)",
                    ],
                    data: [55, 49, 44, 24, 15],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });

    // Doughnut Chart
    var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
    var myChart6 = new Chart(ctx6, {
        type: "doughnut",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(0, 156, 255, .7)",
                        "rgba(0, 156, 255, .6)",
                        "rgba(0, 156, 255, .5)",
                        "rgba(0, 156, 255, .4)",
                        "rgba(0, 156, 255, .3)",
                    ],
                    data: [55, 49, 44, 24, 15],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
})(jQuery);
