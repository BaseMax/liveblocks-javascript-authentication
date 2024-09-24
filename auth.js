const express = require("express");
const c = require("@liveblocks/node");
const cors = require("cors");
const { v4: uuidv4 } = require("uuid");

const liveblocks = new c.Liveblocks({
    secret: "sk_dev_4oLJSBeKQJF8n3tCiEnqkC8f9mMM2gBhlIMIVZImq98FqiTNa_-SIsps6EMaQuG0",
});

const port = 8080;

const app = express();

// app.use((req, res, next) => {
//     res.header("Access-Control-Allow-Origin", "*");
//     res.header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
//     res.header("Access-Control-Allow-Headers", "Content-Type, Referer, Authorization");
//     next();
// });
app.use(cors({
    origin: '*',
    methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    allowedHeaders: ['Content-Type', 'Authorization'],
}));

app.use(express.json());

app.post("/api/liveblocks-auth", async (req, res) => {
    const name = req.query.name;
    const { roomId } = req.body;
    const userId = uuidv4();

    const user = {
        id: userId + name,
        name: name,
        avatar: "https://example.com/marc.png",
        color: "purple",
        organization: "asrez",
        group: "devs",
    };

    console.log(req);
    console.log(user);
    console.log(roomId);

    // const room = await liveblocks.createRoom("a32wQXid4A9", {
    //     defaultAccesses: ["room:write"],
    // });

    const session = liveblocks.prepareSession(
        user.id,
        { userInfo: user.metadata },
    );

    session.allow(`${user.organization}:*`, session.READ_ACCESS);
    session.allow(`${user.organization}:${user.group}:*`, session.FULL_ACCESS);

    const { status, body } = await session.authorize();
    return res.status(status).end(body);
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
