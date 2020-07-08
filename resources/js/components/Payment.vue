<template>
    <canvas  style="width: 100%;" height="400" id="payment"></canvas>
</template>

<script>
    import chart from 'chart.js'
    export default {
        props : ['labels' , 'values'],
        mounted() {
            var ctx = document.getElementById('payment').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: this.labels,
                    datasets: [{
                        label: 'پرداخت های موفق',
                        data: this.values.success,
                        backgroundColor: 'rgba(38, 222, 129,0.5)',
                        borderColor: 'rgba(68, 189, 50,1.0)',
                        borderWidth: 1
                    } ,{
                        label: 'پرداخت های ناموفق',
                        data: this.values.unsuccess,
                        backgroundColor: 'rgba(231, 76, 60,.5)',
                        borderColor: 'rgba(192, 57, 43,1.0)',
                        borderWidth: 1
                    } ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }
</script>
