export default interface UserResponse {
    user: {
        firstName: string;
        lastName: string;
        email: string;
        password?: string;
        phone?: string;
        profile?: string
    };
    permissions: string[];
    roles: string[];
    message?: string; 
}

