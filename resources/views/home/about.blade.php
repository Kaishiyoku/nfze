@extends('app')

@section('content')
    <h1>Games</h1>

    <div class="card-deck p-t-25 p-b-30">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    Natural Selection 2
                </h4>

                <div class="row">
                    <div class="col-sm-6">
                        <h5>General</h5>

                        <table class="table table-sm">
                            <tbody>
                            <tr>
                                <td>Name:</td>
                                <td>{{ $ns2PlayerData['alias'] }}</td>
                            </tr>
                            <tr>
                                <td>Score:</td>
                                <td>{{ $ns2PlayerData['score'] }}</td>
                            </tr>
                            <tr>
                                <td>Level:</td>
                                <td>{{ $ns2PlayerData['level'] }}</td>
                            </tr>
                            <tr>
                                <td>XP:</td>
                                <td>{{ $ns2PlayerData['xp'] }}</td>
                            </tr>
                            <tr>
                                <td>Skill:</td>
                                <td>{{ $ns2PlayerData['skill'] }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <h5>Time played</h5>

                        <table class="table table-sm">
                            <tbody>
                            <tr>
                                <td>Total:</td>
                                <td>{{ format_seconds($ns2PlayerData['time_played'], '%02dh %02dm %02ds') }}</td>
                            </tr>
                            <tr>
                                <td>Marine playtime:</td>
                                <td>{{ format_seconds($ns2PlayerData['marine_playtime'], '%02dh %02dm %02ds') }}</td>
                            </tr>
                            <tr>
                                <td>Alien playtime:</td>
                                <td>{{ format_seconds($ns2PlayerData['alien_playtime'], '%02dh %02dm %02ds') }}</td>
                            </tr>
                            <tr>
                                <td>Commander playtime:</td>
                                <td>{{ format_seconds($ns2PlayerData['commander_time'], '%02dh %02dm %02ds') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection