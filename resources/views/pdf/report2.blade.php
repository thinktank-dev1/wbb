<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>
        <style>
            table, td, div, h1, p {font-family: Arial, sans-serif;}
            
            .details td{
                padding: 30px 0 30px 10px;
            }
            .details tr:nth-child(odd){
                background-color: #ecedee;
                color: #000;
            }
            .bg-top{
                background-color: #8cd50a;
                width: 100%;
                height: 100px;
                border-top-right-radius: 25px;
                border-top-left-radius: 25px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

        </style>
    </head>
    <body>
        <div class="bg-top">
            <center><img src="img/report_logo.png" style="height: 50%; width:50%; margin-top:2%"></center>
        </div>
        <div class="">
            <h1>{{ $lot->vehicle->year.' '.$lot->vehicle->make.' '.$lot->vehicle->model.' '.$lot->vehicle->variant }}</h1>
        </div>
        
        <div class="" style="width: 100%">
            @php
            $count = 0;
            @endphp
            @foreach($lot->vehicle->images AS $image)
                <div style="width: 25%; float: left"><img src="storage/{{$image->image_url}}" style="width: 100%"></div>
                @php
                $count++;
                if($count == 4){
                    break;
                }
                @endphp
            @endforeach
        </div>
        
        
        <div class="">
            <h3 style="color: #8cd50a">CAR INFORMATION</h3>
            <table style="width:100%;border-collapse:collapse;border:0;border-spacing:0;" class="details">
                <tr>
                    <td>
                        <b>Year</b><br />
                        {{ $lot->vehicle->year }}
                    </td>
                    <td>
                        <b>Make</b><br />
                        {{ $lot->vehicle->make }}
                    </td>
                    <td>
                        <b>Model</b><br />
                        {{ $lot->vehicle->model }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Transmission</b><br />
                        {{ $lot->vehicle->transmission }}
                    </td>
                    <td>
                        <b>Fuel Type</b><br />
                        {{ $lot->vehicle->fuel_type }}
                    </td>
                    <td>
                        <b>Varianr</b><br />
                        {{ $lot->vehicle->variant }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Mileage</b><br />
                        {{ $lot->vehicle->mileage }}
                    </td>
                    <td>
                        <b>Color</b><br />
                        {{ $lot->vehicle->color }}
                    </td>
                    <td>
                        <b>Body Type</b><br />
                        {{ $lot->vehicle->body_type }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Engine Type</b><br />
                        {{ $lot->vehicle->engine_type }}
                    </td>
                    <td>
                        <b>VIN Number</b><br />
                        {{ $lot->vehicle->vin_number }}
                    </td>
                    <td>
                        <b>Engine Number</b><br />
                        {{ $lot->vehicle->engine_number }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Natis</b><br />
                        {{ $lot->vehicle->natis }}
                    </td>
                    <td>
                        <b>Service History</b><br />
                        {{ $lot->vehicle->service_history }}
                    </td>
                    <td>
                        <b>Service Book</b><br />
                        {{ $lot->vehicle->service_book }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Service Plan</b><br />
                        {{ $lot->vehicle->service_plan }}
                    </td>
                    <td>
                        <b>Warranty</b><br />
                        {{ $lot->vehicle->warranty }}
                    </td>
                    <td>
                        <b>MMCODE</b><br />
                        {{ $lot->vehicle->mmcode }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="">
            <h3 style="color: #8cd50a">CAR EXTRAS</h3>
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;" class="details">
                <tr>
                    @php
                    $count = 0;
                    @endphp
                    @foreach($lot->vehicle->extras AS $ex)
                    <td>{{ $ex->extra }}</td>
                    @php
                    $count++;
                    if($count > 4){
                        $count = 0;
                        echo "</tr><tr>";
                    }
                    @endphp
                    @endforeach
                </tr>
            </table>
        </div>
        <div class="">
            <h3 style="color: #8cd50a">CAR ACCIDENT REPORT</h3>
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;" class="details">
                <tr>
                    <td>
                        <b>Previous Repairs</b><br />
                        {{ ucwords($lot->vehicle->report->previous_body_repairs) }}
                    </td>
                    <td>
                        <b>Previous Cosmetic Repairs</b><br />
                        {{ ucwords($lot->vehicle->report->previous_cosmetic_repairs) }}
                    </td>
                    <td>
                        <b>Nechanical Faults</b><br />
                        {{ ucwords($lot->vehicle->report->mechanical_faults_warnig_lights) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Windscreen Condition</b><br />
                        {{ ucwords($lot->vehicle->report->windscreen_condition) }}
                    </td>
                    <td>
                        <b>Rims Condition</b><br />
                        {{ ucwords($lot->vehicle->report->rims_condition) }}
                    </td>
                    <td>
                        <b>Interior Condition</b><br />
                        {{ ucwords($lot->vehicle->report->interior_condition) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Front Left Tire</b><br />
                        {{ ucwords($lot->vehicle->report->front_left_tire) }}
                    </td>
                    <td>
                        <b>Front Right Tire</b><br />
                        {{ ucwords($lot->vehicle->report->front_right_tire) }}
                    </td>
                    <td>
                        <b>Back Left Tire</b><br />
                        {{ ucwords($lot->vehicle->report->back_left_tire) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Back Right Tire</b><br />
                        {{ ucwords($lot->vehicle->report->back_right_tire) }}
                    </td>
                    <td>
                        <b>Front Left Rim</b><br />
                        {{ ucwords($lot->vehicle->report->front_left_rim) }}
                    </td>
                    <td>
                        <b>Front Right Rim</b><br />
                        {{ ucwords($lot->vehicle->report->front_right_rim) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Back Left Rim</b><br />
                        {{ ucwords($lot->vehicle->report->back_left_rim) }}
                    </td>
                    <td>
                        <b>Back Right Rim</b><br />
                        {{ ucwords($lot->vehicle->report->back_right_rim) }}
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="">
            <h3 style="color: #8cd50a">CAR CONDITION</h3>
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;" class="details">
                <tr>
                    <th>Side</th>
                    <th>Position</th>
                    <th>Type</th>
                    <th>Severity</th>
                    <th>Estimate Cost</th>
                </tr>
                @foreach($lot->vehicle->inspection AS $insp)
                <tr>
                    <td>{{ ucwords($insp->side) }}</td>
                    <td>{{ $insp->poasition }}</td>
                    <td>{{ $insp->type }}</td>
                    <td>{{ $insp->severity }}</td>
                    <td>@if($insp->estimate_damage_cost){{ number_format($insp->estimate_damage_cost,2) }}@endif</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="">
            <h4>100% ONLINE BAKKIE AUCTIONS</h4>
        </div>
        <div style="padding:10px;background:#8cd50a">
            <p style="margin:0;font-size:12px;line-height:16px;font-family:Arial,sans-serif;color:#000000;">
                All rights reserved &copy;. PEKAR HOLDINGS PTY LTD t/a WE BUY BAKKIES
            </p>
        </div>
    </body>
</html>