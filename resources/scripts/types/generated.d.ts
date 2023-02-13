declare namespace Data.Auth {
export type LoginData = {
email: string;
password: string;
remember: boolean;
};
export type RegisterData = {
name: string;
email: string;
password: string;
password_confirmation: string;
};
}
declare namespace Data.Shared {
export type NotificationData = {
type: Enums.NotificationType;
body: string;
};
export type SharedData = {
user: Data.Shared.UserData;
notification: Data.Shared.NotificationData | null;
};
export type UserData = {
name: string;
email: string;
};
}
declare namespace Enums {
export type NotificationType = 'success' | 'error' | 'warning' | 'info' | 'default';
}
