<div>
    @include('navbar.navbarwwtp')
    <div class="d-flex  px-2" id="tanggalbar" >




        <h6  class="btn bg-gradient-primary dropdown-toggle ">  <i class="fa fa-calendar"></i>&nbsp;Pilih Tanggal</h6>


    </div>
    <button class="btn bg-gradient-primary" wire:click="filter()">filter</button>
    @if ($first ==null)
    <a href="/reportwwtpprint/{{ $start }}/{{ $end }}" class="btn bg-gradient-info mx-2" target="_blank">
        <i class="bi bi-printer-fill"></i>
        Print / PDF
     </a>
     @else
     <a href="/reportwwtpprint/{{ $first }}/{{ $second }}" class="btn bg-gradient-info mx-2" target="_blank">
        <i class="bi bi-printer-fill"></i>
        Print / PDF
     </a>
    @endif




        @livewire('cardgrafik')
        @livewire('grafikbarwwtp', ['awal' => $start, 'akhir' =>$end])




        @section('datarange')
        <script>
              $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {

            window.livewire.emit('tanggallinegrafik', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

        }
        $('#tanggalbar').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

        });




        </script>

        @endsection
</div>
