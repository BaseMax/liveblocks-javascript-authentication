import { createClient } from "@liveblocks/client";

const client = createClient({
  authEndpoint: async (roomId) => {
    const name = localStorage.getItem("name");
    
    console.log("authEndpoint: ", roomId, name);

    const response = await fetch("http://localhost:8080/api/liveblocks-auth?name=" + name, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ roomId }),
    });

    if (!response.ok) {
      throw new Error("Failed to authenticate");
    }

    return await response.json();
  },
});

export { client };
