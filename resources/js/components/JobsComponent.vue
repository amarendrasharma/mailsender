<template>
	<table class="table">
		<tbody>
			<tr
				v-for="(job, index) in allJobs"
				:key="index"
				:class="job.run == true ? 'text-success' : 'text-danger'"
			>
				<td width="80%">{{ job.description }}</td>
				<td>{{ job.created_at }}</td>
				<td>{{ job.run }}</td>
				<!-- <td>{{ !job.run }}</td> -->
			</tr>
		</tbody>
	</table>
</template>

<script>
	export default {
		props: ["jobs"],
		data() {
			return { allJobs: this.jobs };
		},
		created() {
			this.refreshAllJobs();
			Echo.channel("email-queue")
				.listen(".add", e => {
					console.log(e);
					this.refreshAllJobs(e);
					console.log("add");
				})
				.listen(".sent", e => {
					this.refreshAllJobs(e);
					console.log("sent");
				});
		},
		methods: {
			refreshAllJobs(e) {
				axios.get("/jobs").then(e => (this.allJobs = e.data));
			}
		}
	};
</script>