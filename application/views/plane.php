<div class="panel panel-default">
    <div class="panel-heading">Airplane Information</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Plane ID</th>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Price</th>
                <th>Seats</th>
                <th>Reach</th>
                <th>Cruise</th>
                <th>Takeoff</th>
                <th>Hourly</th>
            </tr>
            </thead>
            {plane_info}
            <tbody>
            <tr>
                <td>{id}</td>
                <td>{manufacturer}</td>
                <td>{model}</td>
                <td>{price}</td>
                <td>{seats}</td>
                <td>{reach}</td>
                <td>{cruise}</td>
                <td>{takeoff}</td>
                <td>{hourly}</td>
            </tr>
            </tbody>
            {/plane_info}
        </table>
    </div>
</div>