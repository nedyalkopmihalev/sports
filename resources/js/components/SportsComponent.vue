<template>
    <div>
        <h2>Match Results</h2>
        <table>
            <!--<thead>-->
            <!--<tr>-->
                <!--<th>Match Date</th>-->
                <!--<th>Team</th>-->
                <!--<th>Score</th>-->
            <!--</tr>-->
            <!--</thead>-->
            <tbody>
            <tr v-for="match in matches">
                <td>{{ match.name }}</td>
                <td v-for="tournament in match.tournament">
                    {{ tournament.tournament_name }} - {{ tournament.season.season_name }}

                    <table>
                        <tr v-for="matches in tournament.season.matches">
                            <td>
                                <table>
                                    <tr v-for="matchesIems in matches">
                                        <td>
                                            <!--{{matchesIems}}-->
                                            {{ matchesIems.team_name }}
                                            {{ matchesIems.score }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { ref, defineComponent, onMounted } from 'vue';

export default defineComponent({
    name: 'SportsComponent',
    setup() {
        const matches = ref([]);

        const fetchMatches = async () => {
            const response = await fetch('/api/v1/matches');
            matches.value = await response.json();
        };

        onMounted(() => {
            fetchMatches();
            //setInterval(fetchMatches, 60000);
        });

        return { matches };
    },
});
</script>