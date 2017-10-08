<div class="panel panel-default">
    <div class="panel-heading">Flight Destination Dashboard</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Plane ID</th>
                <th>Departure</th>
                <th>Arrival</th>
            </tr>
            </thead>
            {all_flights}
            <tbody>
            <tr>
                <td>{aircraftCode}</td>
                <td>{departureLocation}</td>
                <td>{destinationLocation}</td>
            </tr>
            </tbody>
            {/all_flights}
        </table>
    </div>
</div>