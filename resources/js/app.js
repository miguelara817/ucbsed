import '../sass/tabler.scss';
import './bootstrap';
import './tabler-init';
import 'datatables.net-dt/css/dataTables.dataTables.css';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import DataTable from 'datatables.net-dt';
import pdfmake from 'pdfmake';
import jszip from 'jszip';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-buttons-dt';
import 'datatables.net-buttons/js/buttons.colVis.mjs';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons-dt/css/buttons.dataTables.css';
import 'datatables.net-buttons-dt/css/buttons.dataTables.min.css';
import language from 'datatables.net-plugins/i18n/es-ES.mjs';
import 'jquery';
import swal from 'sweetalert2';
window.Swal = swal;

new DataTable('#datatable', {
    ordering: true,
    serverSide: false,
    language,
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        },
        top2Start: {
            buttons: [
                'copy', 
                {
                    extend: 'csv',
                    charset: 'UTF-8',
                    bom: true,
                },
                {
                    extend: 'print',
                    charset: 'UTF-8',
                    bom: true,
                    title: 'Datos exportados',
                    titleAttr: 'Exportar'
                }
            ]
        }
    },
});


new DataTable('#datatable2', {
    ordering: true,
    serverSide: false,
    language,
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        },
        top2Start: {
            buttons: [
                'copy', 
                {
                    extend: 'csv',
                    charset: 'UTF-8',
                    bom: true,
                },
                {
                    extend: 'print',
                    charset: 'UTF-8',
                    bom: true,
                    title: 'Datos exportados',
                    titleAttr: 'Exportar'
                }
            ]
        }
    },
});


new DataTable('#datatable3', {
    ordering: true,
    serverSide: false,
    language,
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        },
        top2Start: {
            buttons: [
                'copy', 
                {
                    extend: 'csv',
                    charset: 'UTF-8',
                    bom: true,
                },
                {
                    extend: 'print',
                    charset: 'UTF-8',
                    bom: true,
                    title: 'Datos exportados',
                    titleAttr: 'Exportar'
                }
            ]
        }
    },
});