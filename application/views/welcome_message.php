<h1>Welcome to Albatros Airlines!</h1>
<div id="body">
    <ul class="links" style="display: flex; list-style-type: none; justify-content: space-around;">
        <li><a href="">Home</a></li>
        <li><a href="">Fleet</a></li>
        <li><a href="">Flights</a></li>
    </ul>

    <h2>Number of planes: {no_planes}</h2>
    <h2>Number of flights: {no_flights}</h2>

    <div>

        <h2> List of airports:
            {airports}
            <li>{base}</li>
            <li>{dest1}</li>
            <li>{dest2}</li>
            <li>{dest3}</li>
            {/airports}
        </h2>
        {all_flights}
            {key}
            {departureLocation}
       {/all_flights}
    </div>
</div>