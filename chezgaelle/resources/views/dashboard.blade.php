<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" canvas-div p-6 bg-white border-b border-gray-200">
                     <canvas id="orderlines"></canvas>
                     <canvas id="orderedCategories"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    let categories = <?php echo $categories; ?>;
    let categoriesTab = [];

    for(let i = 0; i< categories.length; i++) {
        categoriesTab.push(categories[i].name);
    }

    let orderlines = <?php echo $orderlines; ?>;

    let products = <?php echo $products; ?>;
    let barChartData = {
        labels: categoriesTab,
        datasets: [{
            label: 'Products',
            backgroundColor: "brown",
            data: products
        }]
    };

    let orderChartData = {
        labels: categoriesTab,
        datasets: [{
            label: 'Ordered Products',
            backgroundColor: "brown",
            data: orderlines
        }]
    };

    window.onload = function() {
        let ctx = document.getElementById("orderlines").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Product categories for sale '
                }
            }
        });

        let orderedCategories = document.getElementById("orderedCategories").getContext("2d");
        window.myBar = new Chart(orderedCategories, {
            type: 'bar',
            data: orderChartData,
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Categories of ordered products '
                },
                {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 40
                        }
                    }]
                    xAxes: [{
                        ticks: {
                            fontSize: 40
                        }
                    }]
                }
            }
        });
    };
</script>
</x-app-layout>
