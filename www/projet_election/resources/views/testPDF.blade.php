<!DOCTYPE html><html>
<head>
    <title>Laravel 12 Generate PDF Example - ItSolutionStuff.com</title>
</head>
<body>
<header style="box-shadow: rgba(0, 0, 0, 0.4) 0px 60px 40px -7px; padding:10px; position: fixed; background-color: white; width:100%">
    <div >
        <div></div>
        <div>
            <div style="display:flex; flex-direction: row; width:100%">
                <div>
                    <a class="fusion-logo-link" >
                        <img decoding="async"
                             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_150,h_80/https://codingfactory.fr/wp-content/uploads/2023/10/Untitled-design-12.jpg"
                             width="150" height="80" alt="Coding Factory by ESIEE-IT Logo"/>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div></div>
</header>

<h1>{{ $title }}</h1>
<p>{{ $date }}</p>
@foreach($representative as $r)
    <p>Délégué et suppléant de {{$class[$r->class_id -1] -> name}} {{$class[$r->class_id -1] -> place}}</p>

    <table class="table table-bordered">

        <tr>
            <th>Role</th>
            <th>Prénom</th>
            <th>Nom de Famille</th>
            <th>Email</th>
        </tr>

            <tr>
                <td>Délégué</td>
                <td>{{ $users[$r->id_representative]->name}}</td>
                <td>{{ $users[$r->id_representative]->lastname }}</td>
                <td>{{ $users[$r->id_representative]->email }}</td></tr>

        <tr>
            <td>Suppléant</td>
            <td>{{ $users[$r->id_suppleant]->name}}</td>
            <td>{{ $users[$r->id_suppleant]->lastname }}</td>
            <td>{{ $users[$r->id_suppleant]->email }}</td>
        </tr>

    </table>
@endforeach

</body>
</html>
