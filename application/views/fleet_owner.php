<div class="panel panel-default">
    <h2 class="panel-heading">Airplanes</h2>
    <div class="panel-body">
        <p><a href="#">Add</a></p>
        <table class="table table-striped table-hover">
            <tr class="info">
                <th>Unique Key</th>
                <th>Plane ID</th>
                <th>Configure</th>
            </tr>
            {fleets}
            <tr title="Unique Key: {key}, Plane ID: {id}">
                <td><a href="/fleet/{key}">{key}</a></td>
                <td>{id}</td>
                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
            </tr>
            {/fleets}
        </table>
    </div>
</div>