<html>
    <head>
        <style>
            @page {
                margin: 100px 25px;
                font-size: 16px;
                font-family: Arial, Helvetica, sans-serif;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10px;
                text-align: center;
            }

            footer {
                position: fixed; 
                bottom: -90px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10px;
                text-align: center;
            }

            .column {
                float: left;
                width: 50%;
            }
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
    </head>
    <body>
        <header style="font-size: 10px; margin-top: -12px;">
            <i><b>By 2028, a world-class Army that is a source of national pride.</b></i>
        </header>

        <footer>
            <div class="row">
                <div class="column" style="width: 30%;">
                    <img src="{{ public_path('argon/img/brand/footerPic.png') }}" height="60px;" />
                </div>
                <div class="column" style="width: 40%;">
                    <div style="margin-top: 20px; text-align: center;"><i><b>Honor. Patriotism. Duty<b></i></div>  
                </div>
            </div>
        </footer>
        
        
        <main style="margin-top: -30px;">
            <div style="text-align: center; letter-spacing: 1.5px;">
                <div style="text-align: center; letter-spacing: 2px; font-size: 20px;">HEADQUARTERS</div>
                <font style="font-size: 20px;"><b>{{ Auth::user()->unit->UnitDesc }}</b></font><br />
                <font style="font-size: 12px;">Fort Andres Bonifacio, Metro Manila</font>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <font style="font-size: 20px;">{{ __('C4S INVENTORY WITH SERIAL NUMBER') }}</font>
            </div>

            <table width="100%" cellspacing="0" cellpadding="5" border="1" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('Unit') }}</th>
                        <th>{{ __('Nomenclature') }}</th>
                        <th>{{ __('Equipment Code') }}</th>
                        <th>{{ __('Commo Code') }}</th>
                        <th>{{ __('Model') }}</th>
                        <th>{{ __('Serial Number') }}</th>                                    
                        <th>{{ __('Date Acquired') }}</th>
                        <th>{{ __('Cost Acquired') }}</th>
                        <th>{{ __('Category Code') }}</th>
                        <th>{{ __('Status') }}</th>                        
                        <th>{{ __('Remarks') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipments as $equipment)
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">{{ $equipment->unitcode }}</td>
                            <td style="text-align:center;">{{ $equipment->nomenclatures->classification }}</td>
                            <td style="text-align:center;">{{ $equipment->nomenclatures->equipment_code }}</td>
                            <td style="text-align:center;">{{ $equipment->nomenclatures->commocategories->commo_code }}</td>
                            <td style="text-align:center;">{{ $equipment->nomenclatures->nomenclature }}</td>
                            <td style="text-align:center;">{{ $equipment->serial_number }}</td>
                            <td style="text-align:center;">{{\Carbon\Carbon::parse($equipment->date_acquired)->format('d F Y')}}</td>
                            <td style="text-align:center;"><span style="font-family: DejaVu Sans;">&#8369;</span> {{ number_format($equipment->cost_acquired, 2) }}</td>
                            <td style="text-align:center;">{{ $equipment->nomenclatures->commocategories->communicationcategories->category_code }}</td>
                            <td style="text-align:center;">{{ $equipment->status }}</td>    
                            <td style="text-align:center;">{{ $equipment->remarks }}</td>    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </body>
</html>