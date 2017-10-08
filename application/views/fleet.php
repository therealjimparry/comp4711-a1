<div class="panel panel-default">
    <div class="panel-heading">Airplanes</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Plane ID</th>
                <th>Plane Model</th>
            </tr>
            </thead>
            {fleets}
            <tbody>
            <tr>
                <td>{key}</td>
                <td><a href="show/{id}">{id}</a></td>
            </tr>
            </tbody>
            {/fleets}
        </table>
    </div>
</div>


