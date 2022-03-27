import Vue from "vue";
		import VueRouter from "vue-router";

		Vue.use(VueRouter);

		import Home from "./pages/Home";
		import AboutUs from "./pages/AboutUs";
		import Post from "./pages/Post";
		import PageNotFound from "./pages/PageNotFound";

		const router = new VueRouter({
		    mode: "history",
		    routes: [
		        {
		            path: "/",
		            name: "home",
		            component: Home
		        },
		        {
		            path: "/about-us",
		            name: "about-us",
		            component: AboutUs
		        },
		        {
		            path: "/posts/:slug",
		            name: "post",
		            component: Post
		        },
						{
							path: '*',
							name: "page-404",
							component: PageNotFound
						}
		    ]
		});

		export default router
