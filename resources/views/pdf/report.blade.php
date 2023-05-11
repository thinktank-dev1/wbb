<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>
        <!--[if mso]>
        <noscript>
        <xml>
        <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        </noscript>
        <![endif]-->
        <style>
            table, td, div, h1, p {font-family: Arial, sans-serif;}
            
            .details td{
                padding: 30px 0 30px 10px;
            }
            .details tr:nth-child(odd){
                background-color: #ecedee;
                color: #000;
            }
        </style>
    </head>
    <body style="margin:0;padding:0;">
        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width:602px;border-collapse:collapse;border:none;border-spacing:0;text-align:left;">
                        <tr>
                            <td align="center" style="padding:40px 0 30px 0;background:#8cd50a; border-top-right-radius: 25px;border-top-left-radius: 25px;">
                                <img src="{{ asset('img/report_logo.png') }}" alt="" width="150" style="height:auto;" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:36px 30px 42px 30px;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding:0 0 36px 0;color:#153643;">
                                            <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;text-transform:uppercase">{{ $lot->vehicle->year.' '.$lot->vehicle->make.' '.$lot->vehicle->model.' '.$lot->vehicle->variant }}</h1>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    @php
                                    $count = 0;
                                    @endphp
                                    <tr>
                                    @foreach($lot->vehicle->images AS $image)
                                        <td><img src="storage/{{$image->image_url}}" style="width: 100%"></td>
                                        @php
                                        $count++;
                                        if($count > 3){
                                            $count = 0;
                                            echo "</tr></tr>";
                                        }
                                        @endphp
                                    @endforeach
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td><h3 style="color: #8cd50a">CAR INFORMATION</h3></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;" class="details">
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
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td><h3 style="color: #8cd50a">CAR EXTRAS</h3></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
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
                            </td>
                        </td>
                        <tr>
                            <td>
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td><h3 style="color: #8cd50a">CAR ACCIDENT REPORT</h3></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
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
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td><h3 style="color: #8cd50a">CAR CONDITION</h3></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
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
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>100% ONLINE BAKKIE AUCTIONS</h4>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px;background:#8cd50a;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                    <tr>
                                        <td style="padding:0;width:50%;" align="left">
                                            <p style="margin:0;font-size:12px;line-height:16px;font-family:Arial,sans-serif;color:#000000;">
                                                All rights reserved &copy;. PEKAR HOLDINGS PTY LTD t/a WE BUY BAKKIES
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>