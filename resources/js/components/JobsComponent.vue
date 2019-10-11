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
				<td>{{ !job.run }}</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
	// import Echo from "laravel-echo";
	// import Pusher from "pusher-js";
	// const EchoDemo = new Echo({
	// 	broadcaster: "pusher",
	// 	key: process.env.MIX_PUSHER_APP_KEY,
	// 	cluster: process.env.MIX_PUSHER_APP_CLUSTER,
	// 	encrypted: true
	// });
	export default {
		props: ["jobs"],
		data() {
			return { allJobs: this.jobs };
		},
		created() {
			this.refreshAllJobs();
			Echo.channel("email-queue")
				.listen(".add", e => {
					this.refreshAllJobs(e);
					console.log("add");
				})
				.listen(".sent", e => {
					this.refreshAllJobs(e);
					console.log("sent");
				});
		},
		methods: {
			refreshAllJobs() {
				axios.get("/jobs").then(e => (this.allJobs = e.data));
			}
		}
	};
</script>