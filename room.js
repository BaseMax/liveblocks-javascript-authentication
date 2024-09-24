import { createClient } from "@liveblocks/client";

const client = createClient({
  publicApiKey: "pk_dev_4hBTxoM5Vkir7gRMcIEP99BTDpqay7jjxcG9ELGa4fomzhWfbzkWgOh4qbU4Rhup",
  authEndpoint: "/auth.php",
});

export const { room, leave } = client.enterRoom("my-room");
