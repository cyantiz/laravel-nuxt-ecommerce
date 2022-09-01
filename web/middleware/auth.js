export default function ({store, route, redirect}) {
    const user = store.state.users.user;
    const adminRoute = /\/admin\/*/g;
    const authRoute =  /\/login\/*/g
    if (!user && (user?.role !== 1) && route.path.match(adminRoute)) {
        redirect("/");
    }

    if (!user && route.path === '/profile') {
        redirect("/");
    }

    if(user && route.path.match(authRoute)) {
        redirect("/");
    }
}