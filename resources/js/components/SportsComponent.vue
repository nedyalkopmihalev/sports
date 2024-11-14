<template>
    <div>
        <h2>Match Results</h2>
        <table>
            <thead>
            <tr>
                <th>Match Date</th>
                <th>Team</th>
                <th>Score</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="match in matches" :key="match.sport">
                <td>{{ match.sport }}</td>
                <!--<td v-for="result in match.results" :key="result.team.id">-->
                    <!--{{ result.team.name }} - {{ result.score }}-->
                <!--</td>-->
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