<div class="row">
    <div class="span4">
        <table>
            <tr><th>Dashboard</th></tr>
        </table>
        <table>
        <tr>
            <th>Flight number</th>
            <th>Aircraft</th>
            <th>Departure Location</th>
            <th>Destination Location</th>
        </tr>
       {all_flights}
        <tr title=
            "Flight: {key}, Aircraft: {aircraftCode}, Departing {departureLocation} at {departureTime}, Destination: {destinationLocation} at {arrivalTime}">
            <td>{key}</td>
            <td>{aircraftCode}</td>
            <td>{departureAirport}</td>
            <td>{destinationAirport}</td>
        </tr>
        <br>
        {/all_flights}
        </table>

    </div>
</div>
