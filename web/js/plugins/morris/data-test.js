/**
 * Created by alexandre on 16/01/15.
 */

$(function(){
    // Donut Chart
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "QCM non faits",
            value: 12
        }, {
            label: "QCM réussis",
            value: 30
        }, {
            label: "QCM échoués",
            value: 20
        }],
        resize: true
    });
});
