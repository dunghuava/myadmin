var mChart = null;
var coloR=[];

function toInt(Ojvalue){
    for (let i=0;i<Ojvalue.length;i++){
        Ojvalue[i]=Ojvalue[i].replace(/[^0-9]/g,'');
    }
    return Ojvalue;
}
function addData(chart, data, datasetIndex) {
    chart.data.datasets[datasetIndex].data = data;
    chart.update();
 }
function draw_chart(data){
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
     };
     for (var i in data) {
         coloR.push(dynamicColors());
     }
    var ctx = document.getElementById('chart_statictic').getContext('2d');
    if (mChart!=null){
        mChart.data.labels=Object.keys(data);
        addData(mChart,Object.values(data),0);
    }else{
        mChart = new Chart(ctx, {
            type:'bar',
            showTooltips: false,
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Triệu',
                    data: Object.values(data),
                    backgroundColor: coloR,
                }],
            },
            options: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Biểu đồ thống kê doanh thu phòng khám'
                },
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