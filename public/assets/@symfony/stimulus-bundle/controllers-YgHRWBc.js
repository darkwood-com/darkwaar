import controller_0 from "../../controllers/hello_controller.js";
export const eagerControllers = {"hello": controller_0};
export const lazyControllers = {"csrf-protection": () => import("../../controllers/csrf_protection_controller.js")};
export const isApplicationDebug = true;