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


export default interface RequestPayment {
    school_name: string;
    school_address: string;
    description: string;
    reference: any[];
}