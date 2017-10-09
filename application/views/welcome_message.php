<h1>Welcome to Albatros Airlines!</h1>
<div id="body">
    <div style="text-align: center; list-style-type: none;">
    <h2>Number of planes: {no_planes}</h2>
    <h2>Number of flights: {no_flights}</h2>

    <div>
        <h2> List of airports: </h2>
            {airports}
                <li>Base Airport: {base}</li>
                <h3>Destinations</h3>
                <ol>
                    <li>{dest1}</li>
                    <li>{dest2}</li>
                    <li>{dest3}</li>
                </ol>
            {/airports}
    </div>
</div>