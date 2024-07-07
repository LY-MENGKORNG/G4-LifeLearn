export default interface User {
    profile: {
        id: any;
        firstName: string;
        lastName: string;
        email: string;
        password?: string;
        phone?: string;
        profile?: string
    };
    permissions: string[]
    roles: string[]
    isAuthenticated: boolean
}

export default interface Book {
    id: number;
    title: string;
    author: string;
    published_at: string;
    price?: number;
}