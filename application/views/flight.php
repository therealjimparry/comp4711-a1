<div>
    <div class="span4">
        <table class="table table-striped table-hover">
            <tr>
                <th>Flight number</th>
                <th>Aircraft</th>
                <th>Departure Location</th>
                <th>Destination Location</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
            </tr>
            {all_flights}
            <tr title=
                "Flight: {key}, Aircraft: {aircraftCode}, Departing {departureAirport} at {departureTime}, Destination: {destinationAirport} at {arrivalTime}">
                <td>{key}</td>
                <td><a href="fleet/{aircraftCode}">{aircraftCode}</a></td>
                <td>{departureAirport}</td>
                <td>{destinationAirport}</td>
                <td>{departureTime}</td>
                <td>{arrivalTime}</td>
            </tr>
            {/all_flights}

            <form action="/flight/add">
                <button class="btn" type="submit">Add</button>
            </form>
        </table>
    </div>
</div>
