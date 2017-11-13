{plane_info}
<table class="table table-striped table-hover">
    <tr>
        <th>Key</th>
        <th>ID</th>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>Price ($)</th>
        <th>Seats</th>
        <th>Flight Range (km)</th>
        <th>Cruise (km/h)</th>
        <th>Min Takeoff Dist. (m)</th>
        <th>Hourly Cost($)</th>
    </tr>
    <tr title="Unique Key:{key}, Airplane ID:{id}, Manufacturer:{manufacturer}, Plane Model:{model}">
        <td>{key}</td>
        <td>{id}</td>
        <td>{manufacturer}</td>
        <td>{model}</td>
        <td>${price}</td>
        <td>{seats}</td>
        <td>{reach}km</td>
        <td>{cruise}km/h</td>
        <td>{takeoff}m</td>
        <td>${hourly}</td>
    </tr>
</table>
{/plane_info}