<!DOCTYPE html><html>
<head>
    <title>{{ $title }} de l'année {{ $date }}</title>
    <style>
        table{
            border-collapse: collapse;
            width : 100%
        }
        th, td{
            table-layout: fixed;
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div >
        <div>
            <div style="display:flex; flex-direction: row; width:100%">
                <div>
                    <a class="fusion-logo-link" >
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(
                        "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_150,h_80/https://codingfactory.fr/wp-content/uploads/2023/10/Untitled-design-12.jpg" )) }}"
                        width="150" height="80" alt="Coding Factory by ESIEE-IT Logo"/>
                        </a>
                </div>
            </div>
        </div>
    </div>
<main>
    <h1>{{ $title }} de l'année {{ $date }}</h1>
    @foreach($representative as $r)
        <h3>Délégué et suppléant de {{$class[$r->class_id -1] -> name}} {{$class[$r->class_id -1] -> place}}</h3>

        <table style="padding-top:10px">

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
</main>
</body>
</html>
